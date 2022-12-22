<div>
    {{-- Modal post Features --}}
    <div wire.ignore.self class="modal fade" id="click" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modall">
                <div class="modal-header text-center" style="background-color: rgb(17, 162, 172)">
                    <h2 class="modal-title title1 text-white"  id="exampleModalLabel" >Create  Blog</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <select name="title" class="form-select" wire:model.defer="title" style="font-size:20px;height:50px;background-color: rgb(19, 131, 65); border-radius: 0px">
                    <option hidden="true">Categories</option>
                    <option selected disabled>Categories</option>
                    <option value="">None</option>
                    <option value="DRAMA">DRAMA</option>
                    <option value="HORROR">HORROR</option>
                    <option value="ROMANTIC">ROMANTIC</option>
                    <option value="ACTION">ACTION</option>
                    <option value="ADVENTURE">ADVENTURE</option>
                    <option value="NARRATIVE">NARRATIVE</option>
                    <option value="FANTASY">FANTASY</option>
                    <option value="ROMANTIC COMEDY">ROMANTIC COMEDY</option>
                    <option value="SPORTS">SPORTS</option>
                    <option value="EXPERIMENTAL">EXPERIMENTAL</option>
                    <option value="DISASTER">DISASTER</option>
                    <option value="HISTORICAL">HISTORICAL FILM </option>
                    <option value="SCIENCE">SCIENCE</option>
                    <option value="MARTIAL ARTS">MARTIAL ARTS</option>
                </select>
                
                <div class="modal-body " style="background-color: white; ">
                    <textarea name="content" id="text-area" cols="50" rows="5" placeholder="Write a blog here" style="font-size: 20px; color: black" wire:model.defer="content"></textarea>
                </div>
                @error('content')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
                <div class="modal-footer" style="background-color: rgb(17, 162, 172)">
                        <button type="button" id="submit-button-1" class="btn btn-secondary form-control" style="background-color: rgb(19, 131, 65);" wire:click="addBlog()"><div wire:loading><svg class="loading"></svg></div>Add Blog</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal post Features --}}

    {{-- modal delete post --}}
    <div wire:ignore.self class="modal fade" id="click-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modall">
                <div class="modal-header">
                    <h5 class="modal-title title3 text-white" id="exampleModalLabel">Are you sure you want to delete this blog?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-white">This deletion can not be undone</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="submit-button" class="btn btn-secondary form-control" wire:click="deleteBlog()">Delete Blog</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal delete post --}}

    {{-- Modal edit feature --}}
    <div wire:ignore.self class="modal fade" id="click-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modall">
                <div class="modal-header">
                    <h5 class="modal-title title2 text-white" id="exampleModalLabel">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <select name="title" class="form-select" wire:model.defer="title">
                    <option hidden="true">Categories</option>
                    <option selected disabled>Categories</option>
                    <option value="">None</option>
                    <option value="DRAMA">DRAMA</option>
                    <option value="HORROR">HORROR</option>
                    <option value="ROMANTIC">ROMANTIC</option>
                    <option value="ACTION">ACTION</option>
                    <option value="ADVENTURE">ADVENTURE</option>
                    <option value="NARRATIVE">NARRATIVE</option>
                    <option value="FANTASY">FANTASY</option>
                    <option value="ROMANTIC COMEDY">ROMANTIC COMEDY</option>
                    <option value="SPORTS">SPORTS</option>
                    <option value="EXPERIMENTAL">EXPERIMENTAL</option>
                    <option value="DISASTER">DISASTER</option>
                    <option value="HISTORICAL">HISTORICAL FILM </option>
                    <option value="SCIENCE">SCIENCE</option>
                    <option value="MARTIAL ARTS">MARTIAL ARTS</option>
                </select>
                <div class="modal-body">
                    <textarea name="content" id="text-area" cols="50" rows="5" placeholder="Write your blog here" wire:model.defer="content"></textarea>
                </div>
                @error('content')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
                <div class="modal-footer">
                    <button type="button" id="submit-button" class="btn btn-secondary form-control" wire:click="updateBlogs()"><div wire:loading><svg class="loading"></svg></div> Update Blog</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal edit feature --}}

    {{-- recent modal delete post --}}
    <div wire:ignore.self class="modal fade" id="click-delete-recent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modall">
            <div class="modal-header">
                <h5 class="modal-title title3 text-white" id="exampleModalLabel">Are you sure you want to delete this blog?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center text-white">This deletion can not be undone</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit-button" class="btn btn-secondary form-control" wire:click="deleteBlog()">Delete Blog</button>
            </div>
            </div>
        </div>
    </div>
    {{-- end recent modal delete post --}}

    {{-- Recent Modal edit feature --}}
    <div wire:ignore.self class="modal fade" id="click-edit-recent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modall">
            <div class="modal-header">
                <h5 class="modal-title title2 text-white" id="exampleModalLabel">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <select name="title" class="form-select" id="rm" wire:model.defer="title">
                <option hidden="true">Categories</option>
                <option selected disabled>Categories</option>
                <option value="">None</option>
                <option value="DRAMA">DRAMA</option>
                <option value="HORROR">HORROR</option>
                <option value="ROMANTIC">ROMANTIC</option>
                <option value="ACTION">ACTION</option>
                <option value="ADVENTURE">ADVENTURE</option>
                <option value="NARRATIVE">NARRATIVE</option>
                <option value="FANTASY">FANTASY</option>
                <option value="ROMANTIC COMEDY">ROMANTIC COMEDY</option>
                <option value="SPORTS">SPORTS</option>
                <option value="EXPERIMENTAL">EXPERIMENTAL</option>
                <option value="DISASTER">DISASTER</option>
                <option value="HISTORICAL">HISTORICAL FILM </option>
                <option value="SCIENCE">SCIENCE</option>
                <option value="MARTIAL ARTS">MARTIAL ARTS</option>
            </select>
            <div class="modal-body">
                <textarea name="content" id="text-area" cols="50" rows="5" placeholder="Write your blog here" wire:model.defer="content"></textarea>
            </div>
            @error('content')
                <p class="text-danger text-center">{{ $message }}</p>
            @enderror
            <div class="modal-footer">
                <button type="button" id="submit-button" class="btn btn-secondary form-control" wire:click="updateBlogs()"><div wire:loading><svg class="loading"></svg></div> Update Blog</button>
            </div>
            </div>
        </div>
    </div>
    {{-- end Recent Modal edit feature --}}
</div>


<style>
    .loading {
        border: 5px solid rgba(255, 255, 255, 0.359);
        border-radius: 50%;
        width: 25px;
        height: 25px;
        border-top: 5px solid rgb(246, 246, 246);
        animation: rotate 0.8s infinite;
        justify-items: center;
        display: inline-block;
    }
    @keyframes rotate {
        0% {transform: rotate(0deg);}
        100% {transform: rotate(360deg);}
    }
</style>
