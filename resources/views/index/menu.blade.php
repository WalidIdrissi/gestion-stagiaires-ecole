<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #35C5DB;/* #0077ff */
      box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      color:black;
      border-bottom: 2px solid white;
    }

    .dropdown-container {
        position: relative;
    }

    .cog-icon {
        margin-left: 750px;
        margin-top: 19px;
        cursor: pointer;
    }
    .cog-icon.clicked {
        margin-top:10px;
    }

    #settingsDropdown {
        position: absolute;
        top: 5%;
        margin-left: 705px;
        display: none;
    }
    #logoutForm{
        position: absolute;
        top: 9%;
        margin-left: 740px;
        display: none;
    }
    .img{
        position: absolute;
        width: 25px;
        margin-left: -25px;
        margin-top: 15px;
    }
</style>

<ul>
    <img src="https://cdn-icons-png.flaticon.com/512/3264/3264289.png" alt="" class="img" >
    <li><a href="{{url('/admin/home')}}"><i class="fas fa-home mr-1"></i>Index</a></li>
    <li><a href="{{ route('filiere.index') }}"><i class="fas fa-book mr-1"></i>Filieres</a></li>
    <li><a href="{{ route('groupe.index') }}"><i class="fas fa-users mr-1"></i>Groupes</a></li>
    <li><a href="{{ route('stagiaire.index') }}"><i class="fas fa-user-graduate mr-1"></i>Stagiaires</a></li>
    <li>
        <i onclick="toggleSelect(this)" class="fas fa-cog cog-icon"></i>
        <select id="settingsDropdown" onchange="handleSelection(this)">
            <option value="">Paramétre</option>
            <option value="{{ route('module.index') }}"><i class="fas fa-cogs mr-1"></i>Modules</option>
            <option value="logout"><i class="fas fa-sign-out-alt mr-1"></i>Déconnecter</option>
        </select>

        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🔐</button>
        </form>
    </li>
</ul>


<script>
    function toggleSelect(icon) {
        var select = document.getElementById("settingsDropdown");
        icon.classList.toggle("clicked");
        if (select.style.display === "none" || select.style.display === "") {
            select.style.display = "block";
        } else {
            select.style.display = "none";
        }
    }

    function handleSelection(select) {
        var selectedValue = select.value;
        if (selectedValue === 'logout') {
            document.getElementById('logoutForm').style.display = 'block';
        } else {
            document.getElementById('logoutForm').style.display = 'none';
            if (selectedValue !== '') {
                window.location.href = selectedValue;
            }
        }
    }
</script>
