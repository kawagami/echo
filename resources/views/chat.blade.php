@extends('welcome')

@section('css')
    <!--CSS bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('chat')
    <div id="id">
        <div class="menu-1icon-talk w-h-start">
            <div class="icon3box">
                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop-talk">
                    <img src="{{ asset('images/lobby/lobby_icon_hint.png') }}" class="icon-hint" />
                    <img src="{{ asset('images/lobby/lobby_icon_talk.png') }}" class="icon-img" />
                </a>
            </div>
        </div>
        <div class="container">
            <div class="modal fade" id="staticBackdrop-talk" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog forchat">
                    <div class="modal-content fortalk">
                        <div class="modal-header">
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">GAME LOBBY</option>
                                <option value="2">GAME LOBBY</option>
                                <option value="3">GAME LOBBY</option>
                                <option value="4">GAME LOBBY</option>
                            </select>
                            <div class="m-people w-h-start">
                                <img src="{{ asset('images/chat/chat_icon_people.svg') }}" />99+
                            </div>
                            <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                <img src="{{ asset('images/common_icon_close.png') }}" />
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- 聊天室表情 -->
                            <div id="light" class="phiz_content">
                                <div class="row">
                                    <img src="{{ asset('images/chat/chat_sticker_01.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_02.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_03.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_04.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_05.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_06.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_07.png') }}" class="col-3" />
                                    <img src="{{ asset('images/chat/chat_sticker_08.png') }}" class="col-3" />
                                </div>
                            </div>
                            <!-- 聊天室表情 end -->
                            <div class="chat-inner">
                                <div class="talk-box w-space-evenly">
                                    <img src="{{ asset('images/profile/profile_photo_10.png') }}"
                                        class="chat-bigimg" />
                                    <div class="chat-box">
                                        <p>AAABBB555666</p>
                                        <p>
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                        </p>
                                        <p>2022-01-03 11:40 已讀</p>
                                    </div>
                                </div>
                            </div>
                            <!-- 自己的聊天內容 加上 italk w-last -->
                            <div class="chat-inner italk w-last">
                                <div class="talk-box w-space-evenly">
                                    <div class="chat-box">
                                        <p>AAABBB555666</p>
                                        <p>Lorem ipsum dolor sit amet.</p>
                                        <p>2022-01-03 11:40 已讀</p>
                                    </div>
                                    <img src="{{ asset('images/profile/profile_photo_10.png') }}"
                                        class="chat-bigimg" />
                                </div>
                            </div>
                            <div class="chat-inner">
                                <div class="talk-box w-space-evenly">
                                    <img src="{{ asset('images/profile/profile_photo_10.png') }}"
                                        class="chat-bigimg" />
                                    <div class="chat-box">
                                        <p>AAABBB555666</p>
                                        <p>
                                            <img src="{{ asset('images/chat/chat_sticker_08.png') }}"
                                                class="img-inchat" />
                                        </p>
                                        <p>2022-01-03 11:40 已讀</p>
                                    </div>
                                </div>
                            </div>
                            <!-- 自己的聊天內容 加上 italk w-last -->
                            <div class="chat-inner italk w-last">
                                <div class="talk-box w-space-evenly">
                                    <div class="chat-box">
                                        <p>AAABBB555666</p>
                                        <p>
                                            <img src="{{ asset('images/chat/chat_sticker_08.png') }}"
                                                class="img-inchat" />
                                        </p>
                                        <p>2022-01-03 11:40 已讀</p>
                                    </div>
                                    <img src="{{ asset('images/profile/profile_photo_10.png') }}"
                                        class="chat-bigimg" />
                                </div>
                            </div>
                        </div>
                        <div class="talkbox-down w-h-space-evenly">
                            <a href="javascript:void(0)"
                                onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"
                                id="fade" class="smile_btn">
                                <img src="{{ asset('images/chat/chat_icon_sticker_a.png') }}" />
                            </a>
                            <a href="javascript:void(0)"
                                onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
                                <img src="{{ asset('images/chat/chat_icon_sticker.png') }}" />
                            </a>
                            <input type="text" class="form-control" id="exampleInput" placeholder="請輸聊天內容" />
                            <img src="{{ asset('images/chat/chat_icon_send.png') }}" />
                        </div>
                    </div>
                </div>
                <!-- menu icon talk-->
                <div class="menu-1icon-talk w-h-start layerup">
                    <div class="icon3box">
                        <a>
                            <img src="{{ asset('images/lobby/lobby_icon_hint.png') }}" class="icon-hint" />
                            <img src="{{ asset('images/lobby/lobby_icon_talk.png') }}" class="icon-img" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
@endsection
