<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->


<!-- Find order Item Modal Section -->
<div class="bg-modal" id="selectsuppliertable" >
    <div class="modal-contents">

        <div class="close" id="close-orderitemtable" onclick="closeModel()">+</div>

        <div class="card">
            <div class="card-header">
                <div class="left-card-header">
                    <h3 class="title">Select Supplier</h3>
                </div>
                <div class="right-card-header">
                    <div class="SearchBtnWap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="#Supplier name">
                            <button type="submit" class="searchButton cripple">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="suppliertablestock">

            </div>
            <div class="card-footer">

                <div class="model-footer" id="model-footer-orderitem">
                    <h5>* Please select an supplier!</h5>
                </div>

                <div class="bottom-row">

                    <nav aria-label="...">
                        <ul class="pagination justify-content-start">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <!--                                <li class="page-item">-->
                            <!--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
                            <!--                                </li>-->
                            <!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    <div class="BtnWap">
                        <button id="excustomerCloseBtn" class="model-btn2 cripple close" onclick="closeModel()">Close</button>
                        <button id="customerAddBtn" class="model-btn cripple" onclick="assignsupplier()"  >Select</button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
