<div class="container">
    @include('livewire.modals.modal')
    <div class="profile">
        <h2 class="mt-3" style="font-family: ubuntu">Recent Blogs</h2>
    </div>
    <div class="post-body">
        <div class="col-md-6 offset-3"  style="width: 35rem">
            @if (session('message'))
                <div id="messagee" class="alert text-black text-center ">{{ session('message') }}</div>
            @endif
            <select class="form-select mb-1" id="searchh" wire:model.lazy="title">
                <option value="All">All</option>
                    <option value="DRAMA">DRAMA</option>
                    <option value="HORROR">HORROR</option>
                    <option value="ROMANTIC">ROMANTIC</option>
                    <option value="ACTION">ACTION</option>
                    <option value="ADVENTURE">ADVENTURE</option>
                    <option value="NARRATIVE">NARRATIVE</option>
                    <option value="FANTASY">NARRATIVE</option>
                    <option value="ROMANTIC COMEDY">ROMANTIC COMEDY</option>
                    <option value="SPORTS">SPORTS</option>
                    <option value="EXPERIMENTAL">EXPERIMENTAL</option>
                    <option value="DISASTER">DISASTER</option>
                    <option value="HISTORICAL">HISTORICAL FILM </option>
                    <option value="SCIENCE">SCIENCE</option>
                    <option value="MARTIAL ARTS">MARTIAL ARTS</option>
            </select>
            <div class="col p-3 shadow-sm rounded mb-5" id="write" style="width: 35rem">
                <input type="text" class="write-2 form-control" placeholder="Search" wire:model.lazy="search">
            </div>
            @foreach ($recents as $recent)
            <div class="card shadow-md mt-3" style="width: 560px">
                <div class="card-header" id="cardd">
                    @role('admin')
                    <span id="dot-icon" class="float-end dropdown dropstart">
                        <span class="fa-solid fa-ellipsis-vertical text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#click-delete-recent" wire:click="delete({{ $recent->id }})">Delete</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#click-edit-recent" wire:click="editBlogs({{ $recent->id }})">Edit</a></li>
                        </ul>
                    </span>
                    <hr>
                    @endrole
                    <span class="float-end" id="titlee">
                        <span class="float-end" id="titleee" style="font-size: 30px; color: white ">-{{ $recent->title }}</span>
                        <span class="
                        {{($recent->title === 'DRAMA')? : '' }}
                        {{($recent->title === 'HORROR')? : '' }}
                        {{($recent->title === 'ROMANTIC')? : '' }}
                        {{($recent->title === 'ACTION')? : '' }}
                        {{($recent->title === 'ADVENTURE')? : '' }}
                        {{($recent->title === 'NARRATIVE')? : '' }}
                        {{($recent->title === 'FANTASY')? : '' }}
                        {{($recent->title === 'ROMANTIC COMEDY')? : '' }}
                        {{($recent->title === 'SPORTS')? : '' }}
                        {{($recent->title === 'EXPERIMENTAL')? : '' }}
                        {{($recent->title === 'DISASTER')? : '' }}
                        {{($recent->title === 'HISTORICAL')? : '' }}
                        {{($recent->title === 'SCIENCE')? : '' }}
                        {{($recent->title === 'MARTIAL ARTS')? : '' }}
                        "></span></span>
                        <img class="profile2" src="
                        {{($recent->user->gender === 'Male') ? asset('images/f1.jpg') : ''}}
                        {{($recent->user->gender === 'Female') ? asset('images/female.png') : ''}}
                        {{($recent->user->gender === 'Transgender') ? asset('images/transgender.png') : ''}}
                        {{($recent->user->gender === 'Bisexual') ? asset('images/bisexual.png') : ''}}
                        ">
                    <span class="name">{{ $recent->user->name }}</span><br>
                    <span class="time">{{ $recent->created_at->format('g:i A') }}</span>
                </div>
                <div class="card-body " id="card" style="background-color: rgb(19, 131, 65); color: white">
                    <div class="contentt"><span>{{ $recent->content }}</span></div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
    @if($recents->isEmpty())
        <div class="text-gray-500">
            <h1 class="text-center">No one is posting yet.</h1>
        </div>
    @endif
    <button onclick="topFunction()" id="myBtn" title="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
</div>

<style>
    .name {
        color: whitesmoke;
        font-size: 20px;
        text-decoration: none;
        cursor: pointer;
    }
    .name:hover {
        color: rgb(204, 202, 202);
    }
    #searchh {
        background-color: rgb(17, 162, 172);
        color: whitesmoke;
    }
    #cardd {
        background-color: rgb(17, 162, 172);
        color: whitesmoke;
    }
    .time {
        font-size: 13px;
        margin-left: 45px;
        opacity: 0.8;
    }
    .contentt span {
        font-size: 19px;
    }
    #titlee {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 14px;
        opacity: 0.8;
    }
    #titleee {
        margin-right: 15px;
        margin-top: 5px;
    }
    #genderr {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 13px;
        opacity: 0.8;
    }
    .alert {
        background-color: rgba(0, 0, 0, 0.12);
    }
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 40px;
        z-index: 99;
        font-size: 25px;
        border: none;
        outline: none;
        background-color: rgb(3, 126, 138);
        color: rgb(255, 255, 255);
        cursor: pointer;
        border-radius: 4px;
        padding: 5px 10px 5px 10px;
    }
    #myBtn:hover {
        background-color: rgb(12, 142, 154);
    }
    #write rgb(17, 162, 172){
        background-color: rgba(116, 115, 115, 0.661);
    }
    .write-2 {
        border-radius: 20px;
    }
    #lc {
        padding: 5px 50px 5px 50px;
         border-radius: 5px;
        cursor: pointer;
    }
    #lc:hover {
        backgroundcolor: rgba(89, 88, 88, 0.593);
    }
    .male {
        background-color: rgb(5, 5, 147);
        padding: 3px;
        border-radius: 3px;
    }
    .female {
        background-color: rgb(243, 27, 239);
        padding: 3px;
        border-radius: 3px;
    }
    .bisexual {
        background-image: linear-gradient(to left, violet, indigo, blue, green, rgba(255, 255, 0, 0.275), rgba(255, 166, 0, 0.407), red);
        padding: 3px;
        color: rgb(229, 220, 229);
        border-radius: 3px;
    }
    .transgender {
        background-image: linear-gradient(to left, rgb(42, 162, 242), rgb(206, 115, 189),rgb(245, 229, 246), rgb(206, 115, 189), rgb(42, 162, 242));
        padding: 3px;
        color: rgb(23, 17, 84);
        border-radius: 3px;
    }
    .font-icon {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        opacity: 0.8;
        color: rgb(241, 241, 33);
    }
    .font-icon-heart {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        color: red;
        opacity: 0.8;
    }
    #dot-icon {
        padding: 5px 12px 5px 12px;
        background-color: rgb(206, 204, 204);
        border-radius: 50%;
        cursor: pointer;
    }
    #dot-icon:hover {
        background-color: rgb(230, 224, 224);;
    }
    .profile2 {
        width: 40px;
        border: 1px solid rgb(66, 65, 65);
        padding: 4px;
        height: 40px;
        border-radius: 50%;
    }
    #write {
        background-color: rgba(116, 115, 115, 0.661);
    }
    .write-2 {
        border-radius: 20px;
    }
    .write-2:hover {
        background-color: rgba(255, 255, 255, 0.789);
    }
    #modall {
        background-color: rgb(52, 52, 52);
        margin-top: 20%;
    }
    .title1 {
        margin-left: 38%;
    }
    .title2 {
        margin-left: 35%;
    }
    .title3 {
        margin-left: 8%;
    }
    .close {
        border-radius: 50%;
        background-color: rgb(65, 64, 64);
        border: 1px solid rgb(65, 64, 64);
        width: 30px;
    }
    .close span {
        color: whitesmoke;
    }
    .close:hover {
        background-color: rgb(125, 121, 121);
    }
    #rm {
        background-color: rgb(52, 52, 52);
        color: whitesmoke;
    }
    #text-area {
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
        color: white;
    }
</style>


<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    setTimeout(function() {
        var msg = document.getElementById("messagee");
        msg.parentNode.removeChild(msg);
    }, 1500);
</script>
