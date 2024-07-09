<section id="about">
    <h3 class="section-title"> KNOW ABOUT SOME PLACES BEFORE YOUR TRAVEL </h3>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <div id="company-about">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=2021&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div id="history">
                <h2> 10 years of successful travels</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vitae sed aperiam qui repudiandae earum voluptatem. Modi at inventore omnis veniam necessitatibus exercitationem vel nesciunt delectus ex officiis, culpa doloremque odit illo saepe placeat. Delectus consequuntur reprehenderit omnis accusantium officiis!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique explicabo blanditiis quidem consequuntur qui quaerat fuga iste tenetur consequatur porro. Aliquam maiores alias doloribus at quisquam quo numquam perferendis. Odit!
                </p>
            </div>
        </div>
    </div>
</section>
<section id="testimonials">
    <h3 class="section-title"> TESTIMONIALS </h3>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <div class="swiper testimonials-slider">
            <div id="testimonials-wrapper" class="swiper-wrapper">
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="testimonial swiper-slide">
                        <p> <?= $testimonial->fields["feedback"]; ?> </p>
                        <div class="traveler-data">
                            <img src="<?= $testimonial->fields["image_profile"]; ?>" alt="Customer Photo">
                            <div>
                                <h3>
                                    <?= $testimonial->fields["name"]; ?>
                                </h3>
                                <p>
                                    <?= $testimonial->fields["trip"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev control"></div>
            <div class="swiper-button-next control"></div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</section>
<section id="facts">
    <h3> Why should you to travel with us. </h3>
    <h2> Facts </h2>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
        <div id="highlights">
            <div class="highlight">
                <i class="fa-solid fa-money-bills"></i>
                <h2> Competitive Princing </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?
                </p>
            </div>
            <div class="highlight">
                <i class="fa-solid fa-star"></i>
                <h2> Quality </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?
                </p>
            </div>
            <div class="highlight">
                <i class="fa-solid fa-ranking-star"></i>
                <h2> very well ranked </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?
                </p>
            </div>
            <div class="highlight">
                <i class="fa-solid fa-headset"></i>
                <h2> great support </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?
                </p>
            </div>
        </div>
    </div>
</section>