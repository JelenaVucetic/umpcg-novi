<?php

namespace App\Http\Controllers;
use App\Post;
use App\Member;
use App\Mail\Membership;
use App\Mail\WelcomeMail;
use Storage;
use Mail;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'addMember', 'becomeMember']]);
    }

    public function index() {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function becomeMember() {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('members.become_member', compact('posts'));
    }

    public function addMember(Request $request) {
           
        $messages = [
            'min' => 'Minimalni broj karaktera je 220.',
            'description.max' => 'Maksimalni broj karaktera je 250.',
            'image.max' => 'Maksimalni veličina slike je 1999.',
            'required' => 'Ispunite obavezno polje'
        ];


        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'image' => 'nullable|max:1999',
            'jmbg' => 'required|size:13',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
             'genter' => 'required',
            'description' => 'min:220|max:250',
            'company' => 'required',
            'pib' => 'required',
            'date' => 'required',
            'address' => 'required',
            'work' => 'required',
            'organization' => 'required'
        ], $messages);
        if ($request->hasFile('image')) {
            //PHOTO
            //Get filename w extension
            $photo = $request->file('image');
            $fileNameWithExt = $photo->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('image')->getclientOriginalExtension();
            //create new filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //slika
            $path = $request->file('image')->move(public_path('img'), $fileNameToStore);
            } else {
            $fileNameToStore = 'no-img.jpg';
            }

        $member = new Member;
        
        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->jmbg = $request->jmbg;
        $member->place = $request->place;
        $member->phone = $request->phone;
        $member->email = $request->email;
         $member->genter = $request->genter;
        $member->image = $fileNameToStore;
        $member->company = $request->company;
        $member->pib = $request->pib;
        $member->date = $request->date;
        $member->address = $request->address;
        $member->web = $request->web;
        $member->work = $request->work;
        $member->organization = $request->organization;
        $member->description = $request->description;
        $member->facebook = $request->facebook;
        $member->instagram = $request->instagram;

        $member->save();
        
       // Mail::to('unijamladihpreduzetnika@gmail.com')->send(new Membership($member));
 
        return redirect()->back()->with('success', 'Uspješno ste poslali zahtjev za članstvo');
    }

    public function showMembers() {
        $members = Member::withAnyStatus()->get();
        return view('members.show_member', compact('members'));
    }

    public function edit($id) {
        $member = \DB::table('members')->where('id', $id)->first();
        return view('members.edit', compact('member', 'id'));
    }

    public function update(Request $request, $id)
    {
        switch($request->get('approve'))
        {
             case 1:
                Member::approve($id);
                break;
            case 2:
                Member::reject($id);
                break;
            case 3:
                Member::postpone($id);
                break;
            default:    
                break;

        }
        
        $member = \DB::table('members')->where('id', $id)->first();
        $email = $member->email;
        
         $data = ([
            'firstname' => $member->firstname,
            'lastname' => $member->lastname,
            'email' => $email,
            'status' =>  $request->approve
            ]);
            
        // Mail::to($email)->send(new WelcomeMail($data));
         
        return redirect('/showMembers'.'#component'.$id);    
    }

    public function editMember($id) {
        $member = \DB::table('members')->where('id', $id)->first();
        return view('members.edit_member', compact('member'));
    }

    public function updateMember(Request $request, $id) {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'image' => 'nullable|max:1999',
            'jmbg' => 'required|size:13',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'genter' => 'required',
            'description' => 'min:220|max:250',
            'company' => 'required',
            'pib' => 'required',
            'date' => 'required',
            'address' => 'required',
            'work' => 'required',
            'organization' => 'required'
        ]);

        $member = \DB::table('members')->where('id', $id)->first();
        if ($request->hasFile('image')) {
            //PHOTO
            //Get filename w extension
            $photo = $request->file('image');
            $fileNameWithExt = $photo->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('image')->getclientOriginalExtension();
            //create new filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //slika
            $path = $request->file('image')->move(public_path('img'), $fileNameToStore);
            \DB::table('members')->where('id', $id)->update([
                'image' => $fileNameToStore,
                ]);
            }

            \DB::table('members')->where('id', $id)->update([

                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'jmbg' => $request->jmbg,
                    'place' => $request->place,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'genter' => $request->genter,
                    'company' => $request->company,
                    'pib' => $request->pib,
                    'date' => $request->date,
                    'address' => $request->address,
                    'web' => $request->web,
                    'work' => $request->work,
                    'organization' => $request->organization,
                    'description' => $request->description,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,

        ]);

        
       // Mail::to('jelenavucetic24@gmail.com')->send(new Membership($member));
        return redirect('/showMembers'.'#component'.$id)->with('success', 'Uspješno ste izmjenili člana.');
    }

    public function destroy($id)
    {
        $member = Member::withAnyStatus()->find($id);
        
        //Check if post exists before deleting
        if (!isset($member)){
            return redirect('/')->with('error', 'Član nije pronađen');
        }
        
        $member->delete();
        return redirect()->back()->with('success', 'Član je uspješno obrisan.');
    }
}
