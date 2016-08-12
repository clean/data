# Clean\Data\Collection  



## Implements:
Countable, Serializable, SeekableIterator, ArrayAccess, Traversable, Iterator

## Extend:

ArrayIterator

## Methods

| Name | Description |
|------|-------------|
|[__call](#collection__call)||
|[__get](#collection__get)|Returns direct value from entity when collection has only one element|
|[__isset](#collection__isset)|Returns isset on entity property when collection has only one element|
|[bindCollection](#collectionbindcollection)|Bind two collections|
|[chunk](#collectionchunk)|Splits collection into chunks|
|[clear](#collectionclear)|Remove all entities form collection|
|[distinctOn](#collectiondistincton)|Eliminates entities that contains the same value in given property|
|[filter](#collectionfilter)|Filter collection from entities not matching criteria given in callback|
|[first](#collectionfirst)|Returns first entity from collection|
|[getAllValuesForProperty](#collectiongetallvaluesforproperty)|Return values from all entities from given property|
|[getBy](#collectiongetby)|Get collection of entities matching criteria given in callback|
|[getKeys](#collectiongetkeys)|Returns collection keys|
|[getNewCollection](#collectiongetnewcollection)|Returns new instance of collection of the same type|
|[getNext](#collectiongetnext)|Returns next entity from collection|
|[getPrevious](#collectiongetprevious)|Returns previous entity from collection|
|[getRandom](#collectiongetrandom)|returns random entity from collection|
|[has](#collectionhas)|Checks if collection has entity with field equals to given value|
|[isEmpty](#collectionisempty)|Returns true if collection is empty|
|[isNotEmpty](#collectionisnotempty)|Returns true if collection is not empty|
|[last](#collectionlast)|Returns last entity from collection|
|[prepend](#collectionprepend)|Prepand entity to the begining of collection|
|[reindex](#collectionreindex)|Renumber collection keys (from zero to n), keeping values in the same place|
|[reverse](#collectionreverse)|Return an collection with elements in reverse order|
|[search](#collectionsearch)|Search for an element with given property and value|
|[shift](#collectionshift)|Shift an entity off the begining of collection|
|[slice](#collectionslice)|Extract a slice of the collection|
|[split](#collectionsplit)|Returns collection of collections created by spliting first Collection to a parts|
|[toArray](#collectiontoarray)|Tranform collection to array|
|[walk](#collectionwalk)|Apply a user supplied function to every member of an Collection|

## Inherited methods

| Name | Description |
|------|-------------|
|__construct|-|
|append|-|
|asort|-|
|count|-|
|current|-|
|getArrayCopy|-|
|getFlags|-|
|key|-|
|ksort|-|
|natcasesort|-|
|natsort|-|
|next|-|
|offsetExists|-|
|offsetGet|-|
|offsetSet|-|
|offsetUnset|-|
|rewind|-|
|seek|-|
|serialize|-|
|setFlags|-|
|uasort|-|
|uksort|-|
|unserialize|-|
|valid|-|



### Collection::__call  

**Description**

```php
public __call (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**




### Collection::__get  

**Description**

```php
public __get (string $name)
```

Returns direct value from entity when collection has only one element 

 

**Parameters**

* `(string) $name`
: property name  

**Return Values**

`mixed`





### Collection::__isset  

**Description**

```php
public __isset (string $name)
```

Returns isset on entity property when collection has only one element 

 

**Parameters**

* `(string) $name`
: property name  

**Return Values**

`mixed`





### Collection::bindCollection  

**Description**

```php
public bindCollection (\Collection $collection, array $compareKeys, string $propertyName)
```

Bind two collections 

 

**Parameters**

* `(\Collection) $collection`
: collection  
* `(array) $compareKeys`
: The name of the key to compare with from target Collection  
* `(string) $propertyName`
: The nae of new property that will be created in source Collection  

**Return Values**

`\Collection`





### Collection::chunk  

**Description**

```php
public chunk (integer $size)
```

Splits collection into chunks 

 

**Parameters**

* `(integer) $size`

**Return Values**

`\Collection`





### Collection::clear  

**Description**

```php
public clear (void)
```

Remove all entities form collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::distinctOn  

**Description**

```php
public distinctOn (string $propertyName)
```

Eliminates entities that contains the same value in given property 

 

**Parameters**

* `(string) $propertyName`
: Name of the property  

**Return Values**

`\Collection`





### Collection::filter  

**Description**

```php
public filter (\Closure $callback)
```

Filter collection from entities not matching criteria given in callback 

 

**Parameters**

* `(\Closure) $callback`
: callback  

**Return Values**

`\Collection`





### Collection::first  

**Description**

```php
public first (void)
```

Returns first entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getAllValuesForProperty  

**Description**

```php
public getAllValuesForProperty (string $name)
```

Return values from all entities from given property 

 

**Parameters**

* `(string) $name`
: name  

**Return Values**

`array`





### Collection::getBy  

**Description**

```php
public getBy (\Closure $callback)
```

Get collection of entities matching criteria given in callback 

Usage example:  
  
$colleciton->getBy(function($entity) {  
   return $entity->name == 'John';  
}); 

**Parameters**

* `(\Closure) $callback`

**Return Values**

`\Collection`





### Collection::getKeys  

**Description**

```php
public getKeys (void)
```

Returns collection keys 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`





### Collection::getNewCollection  

**Description**

```php
public getNewCollection (void)
```

Returns new instance of collection of the same type 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::getNext  

**Description**

```php
public getNext (void)
```

Returns next entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getPrevious  

**Description**

```php
public getPrevious (void)
```

Returns previous entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::getRandom  

**Description**

```php
public getRandom (void)
```

returns random entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::has  

**Description**

```php
public has (string $field, mixed $value)
```

Checks if collection has entity with field equals to given value 

 

**Parameters**

* `(string) $field`
: field  
* `(mixed) $value`
: value  

**Return Values**

`bool`





### Collection::isEmpty  

**Description**

```php
public isEmpty (void)
```

Returns true if collection is empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`





### Collection::isNotEmpty  

**Description**

```php
public isNotEmpty (void)
```

Returns true if collection is not empty 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`bool`





### Collection::last  

**Description**

```php
public last (void)
```

Returns last entity from collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::prepend  

**Description**

```php
public prepend (\Entity $entity)
```

Prepand entity to the begining of collection 

 

**Parameters**

* `(\Entity) $entity`

**Return Values**

`\Collection`





### Collection::reindex  

**Description**

```php
public reindex (void)
```

Renumber collection keys (from zero to n), keeping values in the same place 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::reverse  

**Description**

```php
public reverse (void)
```

Return an collection with elements in reverse order 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Collection`





### Collection::search  

**Description**

```php
public search (string $field, mixed $value, bool $strict)
```

Search for an element with given property and value 

 

**Parameters**

* `(string) $field`
: name of property  
* `(mixed) $value`
: value to compare  
* `(bool) $strict`
: compare value and type of property  

**Return Values**

`integer|string|false`





### Collection::shift  

**Description**

```php
public shift (void)
```

Shift an entity off the begining of collection 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`\Entity`





### Collection::slice  

**Description**

```php
public slice (integer $offset, integer|null $length)
```

Extract a slice of the collection 

 

**Parameters**

* `(integer) $offset`
* `(integer|null) $length`

**Return Values**

`\Collection`





### Collection::split  

**Description**

```php
public split (integer $parts)
```

Returns collection of collections created by spliting first Collection to a parts 

Example:  
  
When collection has 10 element and we would like to split to 3 separate collections:  
  
$splitted = $collection->split(3);  
$splitted->count(); // = 3  
$splitted[0]->count(); // = 4  
$splitted[1]->count(); // = 4  
$splitted[3]->count(); // = 2 

**Parameters**

* `(integer) $parts`

**Return Values**

`\Collection`





### Collection::toArray  

**Description**

```php
public toArray (void)
```

Tranform collection to array 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`array`





### Collection::walk  

**Description**

```php
public walk (\Closure $callback)
```

Apply a user supplied function to every member of an Collection 

 

**Parameters**

* `(\Closure) $callback`
: user supplied function  

**Return Values**

`\Collection`




