<?php

/*
*   Use to show intent of receive a DTO in another interface/abstract class instead of just not using type at all
*/
interface IAnyDTO extends IClientDTO, ICountryDTO
{
}
