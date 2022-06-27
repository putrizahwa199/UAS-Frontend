<template>
  <header id="header">
        <a href="#" class="logo">Admin</a>
        <ul class="navigation">
          <li><a href="#" class="active">Home</a></li>
        <li> <Router-Link to="/about"><a href="#">About</a></Router-Link> </li>
        </ul>
      </header>
</template>

<script>
export default {
    name: 'NavbarView'
};
</script>

<style>
/* navbar */
#header {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  padding: 30px 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 10000;
}
#header .logo {
  color: #ffffff;
  font-weight: 700;
  font-size: 2em;
  text-decoration: none;
}
#header .navigation {
  display: flex;
  justify-content: center;
  align-items: center;
}
#header .navigation li {
  list-style: none;
  margin-left: 20px;
}
#header .navigation li a {
  text-decoration: none;
  padding: 6px 15px;
  color: #fff;
  border-radius: 20px;
}
#header .navigation li a:hover {
  background: #fff;
  color: #111;
}
#header .navigation li a:hover,
#header .navigation li a.active {
  background: #fff;
  color: #111;
}
</style>