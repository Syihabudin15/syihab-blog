@extends('layouts')
@section("content")

<section title="List Article" class="py-5 px-3">
    <section class="articles">
        <div>
            <h1 class="text-center py-4">Judul Artikel</h1>
            <section title="list item category" class="list-art my-5 art-list text-justify px-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptate illo excepturi quidem, expedita totam numquam fugit eaque quibusdam ratione.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque in animi totam nobis quod iste quisquam temporibus eum eius tempora pariatur dolorem voluptatem enim nam inventore numquam, esse maxime natus cumque modi omnis doloribus necessitatibus? Est quasi doloribus officia debitis aliquam corrupti facilis alias omnis ab rem mollitia in, explicabo, excepturi nobis! Laboriosam beatae similique asperiores alias necessitatibus, maiores mollitia quos inventore commodi temporibus, non harum distinctio odit reiciendis? Obcaecati saepe repudiandae perspiciatis suscipit minima, fugit animi perferendis quis doloremque excepturi, velit quasi modi quod praesentium doloribus aut dolores qui necessitatibus ut illo? Cumque rerum fuga sunt reiciendis aspernatur mollitia quasi consectetur! Tempore magnam fugit cum necessitatibus reprehenderit nam qui. Numquam sit voluptate tempore, suscipit sequi, voluptatum quo velit fuga ipsam dicta minima! Ratione commodi consequatur blanditiis asperiores aliquam illo soluta. Accusantium voluptatibus expedita cum odio totam, quod explicabo consectetur voluptas laboriosam aspernatur aperiam maxime assumenda similique sequi! Sunt praesentium ipsa soluta provident! Sunt eaque esse, blanditiis architecto, atque illo quidem odio incidunt earum mollitia minima? Perferendis, molestiae nesciunt ab earum illo rem cupiditate neque quo eos facere labore consequuntur fuga, tempore sed natus porro obcaecati similique omnis tempora praesentium sequi eius. Eveniet debitis, dolorum tempora omnis quas iusto molestiae.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa distinctio iste natus tempora sapiente consectetur nemo delectus, velit adipisci exercitationem non quo nesciunt iure soluta quae illum nobis fugit facere sit reiciendis explicabo ipsam aperiam quibusdam. Est, eaque? Eos nisi odit illum molestias in ex eius cumque facere explicabo expedita perspiciatis nemo officia minus, sed repellat architecto laborum sit beatae aut nostrum nam aspernatur! Iure temporibus dolore fuga eius vel perspiciatis, ipsam eveniet consectetur minus reiciendis quam itaque libero voluptate quibusdam maxime delectus maiores tempora fugiat necessitatibus sunt explicabo ducimus modi similique. At ad, fugit rem libero repellat ex incidunt fuga corrupti veniam qui, amet commodi laudantium numquam sed adipisci tenetur reiciendis vitae quaerat. Doloribus fuga id architecto exercitationem velit, aperiam, molestias quasi iure labore earum nulla. Asperiores soluta, similique deserunt possimus ad exercitationem iure laudantium magnam eos optio officiis quo commodi quod, culpa fugit. Consectetur ad ducimus voluptatum perferendis, iusto illum veniam, sit consequatur similique eum nemo quae ipsum doloremque cumque voluptatem officiis, dicta officia eaque quos aut laudantium tempora omnis quo sequi. Error, voluptas. Consequuntur consectetur sint distinctio beatae, vel alias, harum error reprehenderit tempore numquam voluptatum perspiciatis maiores culpa laboriosam repellat itaque similique iste natus repellendus eos.</p>
            </section>
            <div class="likes">
                <i class="bi bi-hand-thumbs-up btn-outline-primary"></i>
                <i class="bi bi-hand-thumbs-down btn-outline-danger"></i>
            </div>
            <div>
                <span>#Tags: </span>
                <span class="btn btn-outline-info btn-sm">Tag1</span>
                <span class="btn btn-outline-info btn-sm">Tag1</span>
                <span class="btn btn-outline-info btn-sm">Tag1</span>
            </div>
        </div>
        <section title="Short Tools" class="short-tools mt-5">
            <div class="search-tool">
                <input placeholder="cari artikel" >
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
            <div class="search-tool">
                <h3>Populer</h3>
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
            <div class="search-tool">
                <h3>Hot Kategori</h3>
                <div class="result-search-tools">
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                    <a href="/">Programming</a>
                </div>
                <div class="more">
                    <a href="/">more..</a>
                </div>
            </div>
        </section>
    </section>
    <section title="Comments" class="comment-wrap mt-5">
        <h2>Komentar</h2>
        <div>
            <div>
                {{-- Root --}}
                <div class="cmt cmt-root">
                    <div class="img-coment">
                        <i class="bi bi-person"></i>
                    </div>
                    <div >
                        <div class="cmt-author">
                            <span class="d-block name">Syihabudin</span>
                            <span class="status">People</span>
                        </div>
                        <div class="cmt-desc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut, ea?
                        </div>
                    </div>
                </div>
                {{-- End Root --}}
                
                {{-- Reply --}}
                <div class="cmt cmt-reply">
                    <div class="img-coment">
                        <i class="bi bi-person"></i>
                    </div>
                    <div >
                        <div class="cmt-author">
                            <span class="d-block name">Syihabudin</span>
                            <span class="status">People</span>
                        </div>
                        <div class="cmt-desc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut, ea?
                        </div>
                    </div>
                </div>
                {{-- End Reply --}}
                <div class="cmt cmt-reply">
                    <div class="img-coment">
                        <i class="bi bi-person"></i>
                    </div>
                    <div >
                        <div>Buat Balasan</div>
                        <form>
                            <div>
                                <label></label>
                                <textarea name="" id=""></textarea>
                            </div>
                            <div class="justify-content-center mt-2">
                                <button class="btn btn-primary">Balas</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Input Root--}}
                <div >
                    <div class="cmt cmt-root cmt-input">
                        <div class="img-coment">
                            <i class="bi bi-person"></i>
                        </div>
                        <div >
                            <div>Buat komen</div>
                            <form>
                                <div>
                                    <label></label>
                                    <textarea ></textarea>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button class="btn btn-primary">Komen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End Input Root --}}
            </div>
            <div></div>
        </div>
    </section>
</section>

@endsection