{{-- Header basique de navigation --}}
    <div class="header flexVertical flex flx1 spaceA">
        <div class="flx1" class="titleHeader">
           <div class='flexVertical'>
            <h2 >Formation plus</h1><br>
            
            </div>
        </div>
        <div class="flex flx1 hideOnBreakpoint" style="font-size: 1vw;">

            <ul class="flex flexVertical noLiStyle ulTest gap1">
                    <li ><a href="#">Accueil</a></li>
                    <li ><a href="#" >Conventions</a></li>
                    <li ><a href="#" >Attesations</a></li>
            </ul>
        </div>
        <div class="flex flx1 hideOnBreakpoint" style="font-size: 1vw;">
            @auth
                <form  class="flex flexVertical noLiStyle" id="logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li >
                        <a href="#">Se déconnecter</a>
                    </li>
                </form>
            @endauth
            @guest
                <ul class="flex flexVertical noLiStyle ulTest gap1" >
                    <li ><a href="#">Inscription</a></li>
                    <li ><a href="#">Connexion</a></li>
                    <li ><a href="#" >Créer une Convention</a></li>
                </ul>
            @endguest
        </div>
        <div class="main-nav" hidden>
            <ul class="nav-links">
                <li ><a href="#">Accueil</a></li>
                <li ><a href="#" >Conventions</a></li>
                <li ><a href="#" >Attesations</a></li>
                @guest
                <li ><a href="#">Inscription</a></li>
                <li ><a href="#" >Connexion</a></li>
                @endguest
                <li ><a href="#" >Créer une Convention</a></li>
                @auth
                <form id="logout" method="POST" action="#">
                    @csrf
                    <li >
                        <a href="#">Se déconnecter</a>
                    </li>
                </form>
                @endauth
            </ul>
        </div>
        <div class="burger">
            <div class="line line1"></div>
            <div class="line line2"></div>
            <div class="line line3"></div>
        </div>

    </div>
@guest
    <div class="guestPage flex flx1 flexVertical spaceE" >
        <div class="flexVertical flx1" style="color: black">
            <p>L’objectif de notre centre est de développer une offre de formation de qualité afin de répondre aux problématiques des entreprises de la région en terme de recrutement et mettre sur la voie d’un emploi durable des personnes désireuses de se former dans les domaines du commerce et de l’hôtellerie restauration.
                <br>
                C’est aussi donner la possibilité à des salariés de valider leurs compétences par le biais de formations qualifiantes.<p>
        </div>
        <div class="flexVertical flx1"  style="background-color: rgb(24, 156, 101)"></div>
    </div>
@endguest


<script>
    document.addEventListener('DOMContentLoaded', nav);
    function nav(){
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.main-nav');
        burger.addEventListener('click', ()=>{
            nav.classList.toggle('show')
        })
    }
</script>
