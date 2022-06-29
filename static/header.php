<header>
    <div class="container">
        <div class="container_all_header">

                <div class="box_header_right">
                    <a href="/"> <img src="/img/znak.png" alt=""> </a>
                </div>

                <div class="box_header_center">
                    <a href="/"> <h11> Старый Пасечник </h11> </a>
                </div>

                <div class="box_header_left">
                    <nav class="menu">
                        <ul class="list">
                           <!-- <li>
                                ======Реализовать посже=====
                                <a class="link" href="/blog"> <div class="icon"> <img src="/img/icon_foto.png" alt=""> </div> <p1>Блог</p1> </a>
                            </li> -->

                            <?php if(!isset($_SESSION['user'])): ?>

                                <li>
                                    <a id="linkInPut" class="link popup-link"> <div class="icon"> <img src="/img/icon-in.png" alt=""></div> <p1>Вход</p1> </a>
                                </li>

                            <?php endif; ?>


                            <?php if(isset($_SESSION['user'])): ?>

                                <li>
                                    <a class="link" href="/content">  <div class="icon"> <img src="/img/icon_QS.png" alt=""> </div> <p1>Статья</p1> </a>
                                </li>

                                <li>
                                    <a class="link" href="/account">  <div class="icon"> <img src="/img/icon_LK.png" alt=""> </div> <p1>Профиль</p1> </a>
                                </li>


                                <li>
                                    <a class="link" href="/" id="exit_all">
                                        <div class="icon">
                                            <form action="" method="POST" id="log_out">
                                                <input type="hidden" name="destroySession" value="1">
                                                <input type="image" src="/img/icon-exit.png" alt="" width="26" height="28" name=DESTROY SESSION">
                                            </form>
                                        </div>
                                      <p1>Выход</p1>
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </nav>
               </div>

                    <div class="section">
                        <span></span>
                    </div>

        </div>
</header>