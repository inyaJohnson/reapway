@extends('layouts.app')
@section('content')

    <body class="bg-white">
    <!--Main Navigation-->

    <div>
        @include('layouts.navigation')
    </div>


    <!--Main layout-->
    <main class="" style="margin-top: 100px;">
        <div id="faq">
            <h3 class="reap-color text-center my-5" style="font-weight:900">Frequently Asked Questions (FAQ)</h3>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="font-weight-bold">What is ReapWay?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                ReapWay is a premium financial hub that helps individuals and groups, Africans in
                                particular, build lasting wealth with guaranteed results.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                <span class="font-weight-bold">What does ReapWay do?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                At ReapWay, we trade in the Financial Market and invest in Real Estate and Agriculture.
                                As a result of this, we have gathered a wide variety of experience trading at many
                                levels of the Foreign Exchange, managing an expansive array of investment portfolios and
                                distributing wealth to our various clients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                <span class="font-weight-bold">Is ReapWay Registered with any Government Agency?</span><span
                                        class="float-right"><i
                                            class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Yes, ReapWay is registered with the CAC with the registration number - BN 3173871
                                Also, ReapWay is certified by the EFCC Special Control Unit Against Money Laundering
                                with the certification number - RN: SC 072993
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                <span class="font-weight-bold">Does ReapWay have a Corporate Account Number for transactions?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Yes, we have an operational Corporate Account with Providus Bank. The account number is
                                made available to our clients when necessary.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                <span class="font-weight-bold">How Competent and Reliable is ReapWay?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                ReapWay is managed by a Competent Team of Individuals who are Astute Professionals in
                                Funds Management, Time-Proven Financial Market Analysts and Top-Notch Digital Marketers
                                and Agents who have amassed a wide range of relevant experiences and are driven by a
                                passion for Excellence that is only rivalled by their desire to help create a world of
                                financially secure people.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                <span class="font-weight-bold">Is this a Ponzi Scheme?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                No, our investment plans at ReapWay are not a Ponzi Scheme. Our seasoned financial
                                analysts analyze the financial market to discover the best opportunities for trade and
                                our professional fund managers trade with the capital gathered from our “investors” and
                                then share the profit made with these investors.

                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                <span class="font-weight-bold">What is ReapWay’s Investment Process?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                At ReapWay, our Investment Process is simple and straightforward. We follow a four-step
                                process: Advise - Fund - Wait - Reap. This means that we provide professional advice to
                                our clients to help them determine the best investment plan that suits them. Afterwards,
                                they are required to fund the plan. Then they wait for the investment circle to be
                                completed after which they will be able to get back their original capital and the
                                accrued returns on investment.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingEight">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                <span class="font-weight-bold">What are the available Investment Options/Plans?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Presently, we have only four standard Investment Plans (apart from our periodic
                                Investment Promos). These four Investment Plans are:
                            <ul class="faq-list">
                                <li>Lite Plan - 20% ROI in 25 Working Days</li>
                                <li>Classic Plan - 25% ROI in 30 Working Days</li>
                                <li>Premium Plan - 40% ROI in 2 Months</li>
                                <li>Elite Plan - 100% ROI in 4 Months</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingNine">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseNine" aria-expanded="false"
                                    aria-controls="collapseNine">
                                <span class="font-weight-bold">What are the Minimum and Maximum Capital I can Invest?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                This varies according to the investment plan selected. But on a general note, the
                                Minimum Capital that can be invested with us for now is N50,000 and the Maximum Capital
                                that can be invested with us for now is N20,000,000.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTen" aria-expanded="false"
                                    aria-controls="collapseTen">
                                <span class="font-weight-bold">Will I get my Returns On Investments?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Yes. You will definitely get back your Original Capital and the accrued ROI once the
                                Investment Circle for the plan funded is complete.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingEleven">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false"
                                    aria-controls="collapseEleven">
                                <span class="font-weight-bold">How long do I wait before my Investment is ripe for Withdrawal?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                The wait period varies according to the Investment Plan selected. The range is between
                                25 Working Days to 4 Months (for now), depending on the uniqueness of the plan funded
                                and the size of the promised ROI.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwelve">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false"
                                    aria-controls="collapseTwelve">
                                <span class="font-weight-bold">How do I Withdraw my Investment and ROI?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Once your Funded Plan has completed its Circle, you can explore our Withdrawal Options,
                                select the one that suits your present desire and process the option by Chatting LIVE
                                with our Online Customer Support Desk - Click Here To Chat Live With Us. [insert chat
                                link]

                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThirteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false"
                                    aria-controls="collapseThirteen">
                                <span class="font-weight-bold">Can I Reinvest my Capital and ROI?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Yes, you can. As a matter of fact, this is one of our Withdrawal Options. You can select
                                and process this option by Chatting LIVE with our Online Customer Support Desk - Click
                                Here To Chat Live With Us. [insert chat link]
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingFourteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false"
                                    aria-controls="collapseFourteen">
                                <span class="font-weight-bold">How can I Open an Investment Profile with ReapWay?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                By default, every active Investor on our database has an Investment Profile with us.
                                However, any prospective client can open an Investment Profile with ReapWay either by
                                Creating A Free Account through the website or by Chatting LIVE with our Online Customer
                                Support Desk - Click Here To Chat Live With Us. [insert chat link]
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingFifteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false"
                                    aria-controls="collapseFifteen">
                                <span class="font-weight-bold">How long will these Investment Plans last?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Our Standard Investment Plans will last for as long as we believe they are relevant to
                                the ever evolving dynamics of the Financial Market and the diversities of our
                                prospective clients.

                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingSixteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false"
                                    aria-controls="collapseSixteen">
                                <span class="font-weight-bold">Is my Investment Secure?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Absolutely! Your investment(s) is/are secure. This is because they are protected by a
                                Security Fund that allows us to minimise losses in the event of their happenstances. Our
                                Memorandum Of Understanding also guarantees that in any case of loss borne by the
                                company as a result of unforeseen circumstances, our clients will at least still be able
                                to get back their original capital.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingSeventeen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false"
                                    aria-controls="collapseSeventeen">
                                <span class="font-weight-bold">What is ReapWay’s Vision for every Investor?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Our Vision for every Investor is to help them achieve financial freedom by exposing them
                                to various financial growth opportunities and guiding them in the explorations of these
                                opportunities.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingEighteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseEighteen" aria-expanded="false"
                                    aria-controls="collapseEighteen">
                                <span class="font-weight-bold">How long will these Investment Plans last?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Our Standard Investment Plans will last for as long as we believe they are relevant to
                                the ever evolving dynamics of the Financial Market and the diversities of our
                                prospective clients.

                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingNineteen">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="false"
                                    aria-controls="collapseNineteen">
                                <span class="font-weight-bold">How can I Partner with ReapWay?</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseNineteen" class="collapse" aria-labelledby="headingNineteen"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                You can partner with ReapWay by discussing the details of the partnership directly with
                                our CEO. Our Online Customer Support Desk will give you directions on how to reach the
                                CEO directly - <a href="https://api.whatsapp.com/send/?phone=2349132054210&text&app_absent=0">Click Here To Chat Live With Us.</a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingtwenty">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapsetwenty" aria-expanded="false"
                                    aria-controls="collapsetwenty">
                                <span class="font-weight-bold">Got More Questions? Ask Us:</span><span
                                        class="float-right"><i class="fas fa-sort-down reap-color"></i></span>
                            </button>
                        </h2>
                    </div>
                    <div id="collapsetwenty" class="collapse" aria-labelledby="headingtwenty"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="faq-list">
                                <li>Chat Live With Our Online Customer Support Desk.</li>
                                <li>Or Place A Call To Us.</li>
                                <li> Or Send An Email.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->
    @endsection
    @section('footer')
        @include('layouts.footer')
    @endsection

    </body>
