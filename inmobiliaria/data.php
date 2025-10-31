<?php
session_start();

if (!isset($_SESSION['clientes_arrendatarios'])) $_SESSION['clientes_arrendatarios'] = [];
if (!isset($_SESSION['clientes_propietarios'])) $_SESSION['clientes_propietarios'] = [];
if (!isset($_SESSION['propiedades'])) $_SESSION['propiedades'] = [];
if (!isset($_SESSION['cola_alquileres'])) $_SESSION['cola_alquileres'] = [];  
if (!isset($_SESSION['pila_alquiladas'])) $_SESSION['pila_alquiladas'] = [];  