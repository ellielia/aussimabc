@extends('layouts.admin')

@section('content')
    <h3>Send a Tweet</h3>
    <hr>
    <div class="alert alert-danger">
        Please DO NOT abuse this tweet system.
    </div>
    <label>Tweet Content</label>
    <textarea id="tweetcontent" onkeyup="countChars(this)" class="form-control"></textarea>
    <label>Currently on <span id="charNum">0</span> characters</label>
    <script>
        function countChars(obj){
        document.getElementById("charNum").innerHTML = obj.value.length;
        }
    </script>
    <br/>
    <div class="row">
        <div class="col">
            <label>Twitter Handle</label>
            <input class="form-control" type="text" placeholder="couriermail" value="couriermail" id="handle">
        </div>
        <div class="col">
            <label>Avatar</label>
            <input class="form-control" type="url" value="https://pbs.twimg.com/profile_images/846231081284087808/ZnYm7dwY_400x400.jpg" id="avatar">
        </div>
    </div>
    <br/>
    <div class="row">
        <button id="tweetButton" onclick="tweet()" class="btn btn-primary">Send Tweet</button>
    </div>
    <p>
        Alice Moore https://pbs.twimg.com/profile_images/1144145333070336001/kzViAElf_400x400.jpg<br/>
        ABC News https://pbs.twimg.com/profile_images/1034589406005317632/Cdi3F2ro_400x400.jpg
    </p>
    <script>
        function tweet() {
            let tweetContent = $("#tweetcontent").val();
            let handle = $("#handle").val();
            let avatar = $("#avatar").val();
            if (tweetContent.length > 280) {
                alert("Tweet too long");
                return;
            }
            $.ajax({
                type:'POST',
                url:'{{route('couriermail.send')}}',
                data: {
                    tweetContent: tweetContent,
                    handle: handle,
                    avatar: avatar
                },
                dataType: 'json',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data) {
                    alert("Tweet sent!");
                },
                error: function(xhr, status, error) {
                    alert(xhr.status + " " + xhr.statusText + " " + error);
                }
            });
        }

    </script>
@endsection