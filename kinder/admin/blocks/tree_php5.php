<?php
session_start(); //��������� ������
include_once "header.php"; //���������� header �����

include_once "../class/NavAdmin.php"; //���������� ����� ��� ������ (���� �������������� ����������) 

// Worked code!
$tree = new NavAdmin(); 
$tree->outTree(0, 0); //������� ������
