<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
fields:
  
  title:
    label: Title
    type:  text
  
  client:
    label: Client
    type:  text
    width: 1/2

  type:
    label: Type
    type:  text
    width: 1/4

  year:
    label: Year
    type:  text
    width: 1/4

  text:
    label: Desicription
    type:  textarea
    size:  small

  color:
    label: Background Color
    type:  text
    width: 1/4

  intro:
    label: Intro
    type:  textarea
    size:  small

