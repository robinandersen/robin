<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
fields:

  title:
    label: Title
    type:  text

  cover:
    label: Cover
    type:  textarea

  color:
    label: Background Color
    type:  text
    width: 1/4

  type:
    label: Type
    type:  text

  client:
    label: Client
    type:  text
    width: 1/4

  agency:
    label: Agency
    type:  text
    width: 1/4

  developer:
    label: Developer
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

  intro:
    label: Intro
    type:  textarea
    size:  small

  project:
    label: Project
    type:  textarea
