

<div class="tab-content">
    <div class="tab">
        <button class="tablinks active" onclick="openEmp(event, 'RawMaterial')">Raw Material</button>
        <button class="tablinks" onclick="openEmp(event, 'Tools')">Tools</button>
        <button class="tablinks" onclick="openEmp(event, 'Machine')">Machine</button>
    </div>
    <!- ---------------------------------Raw Material Tool Machine------------------------------------------------------------------------------------ -->
    <div id="tabcontentid" class="tabcontent">
        <div class="flex-row-tab">
            <div class="SearchBtnWap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="What are you looking for?">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="BtnWap">
                <button id="adduser" class="audButton" onclick="location.href"  >Add</button>

                <button class="audButton">Update</button>


            </div>
        </div><!--flex row-->

        <div id="tableParent" class="tableParent">

        </div>

    </div>
</div>