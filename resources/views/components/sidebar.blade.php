
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i>
</a>
  <a href="" class="navbar-brand"><img src="{{asset('Logo.png')}}" class="img-fluid" width="100%"> </a>
  <a class="item" href="{{url('admin/kereta')}}"><i class="fa fa-calendar-o mr-2"></i> Kereta</a>
  <a class="item" href="{{url('admin/tiket')}}"><i class="fa fa-book mr-2"></i> Tiket</a>
  <a class="item" href="{{url('admin/pemesanan')}}"><i class="fa fa-clock mr-2"></i> Pemesanan</a>
  <a class="item" href="{{url('admin/pembayaran')}}"><i class="fa fa-pencil mr-2"></i> Pembayaran</a>

</div>



<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<!-- <div class="navigation">
            <ul>
                <li>
                    <a href="hai.html">
                        <span class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">Admin Page</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">CRUD Activities</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">CRUD Researche</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">CRUD MEmeber</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                        <span class="title">Data Pendaftar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="header">
            <div class="toggle" onclick="toggleMenu()"></div>
        </div>

<script type="text/javascript">
    function toggleMenu(){
        let navigation = document.querySelector(".navigation")
        let toggle = document.querySelector(".toggle")

        navigation.classList.toggle('active')
        toggle.classList.toggle('active')

    }
</script>

    -->

