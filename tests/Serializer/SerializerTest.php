<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MagicLegacy\Component\MtgJson\Test\Serializer;

use MagicLegacy\Component\MtgJson\Entity\Ruling;
use MagicLegacy\Component\MtgJson\Exception\MtgJsonSerializerException;
use MagicLegacy\Component\MtgJson\Serializer\MtgJsonSerializer;
use PHPUnit\Framework\TestCase;
use Safe;
use Safe\Exceptions\JsonException;

/**
 * Class SerializerTest
 *
 * @author Romain Cottard
 */
class SerializerTest extends TestCase
{
    /**
     * @return void
     * @throws MtgJsonSerializerException
     */
    public function testICanSerializeAndDeserializeAValueObject(): void
    {
        //~ Serializer / Unserializer service
        $serializer = new MtgJsonSerializer();

        //~ Create new original VO
        $originalEntity = new Ruling('2020-01-01', 'Ruling text here');

        //~ Serialize VO
        $json = $serializer->serialize($originalEntity);

        //~ Unserialize VO
        /** @var Ruling $unserializedEntity */
        $unserializedEntity = $serializer->unserialize($json, Ruling::class);

        //~ Compare data
        $this->assertEquals($originalEntity, $unserializedEntity);
    }

    /**
     * @return void
     * @throws MtgJsonSerializerException
     * @throws JsonException
     */
    public function testAnExceptionIsThrownWhenUnserializedStringHaveNotSupportedField(): void
    {
        $data = ['date' => '2020-01-01', 'other' => 'Ruling text here'];

        $this->expectException(MtgJsonSerializerException::class);
        (new MtgJsonSerializer())->unserialize(Safe\json_encode($data), Ruling::class);
    }

    /**
     * @return void
     * @throws MtgJsonSerializerException
     */
    public function testAnHappySerializerExceptionIsThrownWhenSerializeInvalidData(): void
    {
        $this->expectException(MtgJsonSerializerException::class);
        (new MtgJsonSerializer())->serialize(
            new class implements \JsonSerializable {
                public function jsonSerialize()
                {
                    return "\xB1\x31";
                }
            }
        );
    }

    /**
     * @return void
     * @throws MtgJsonSerializerException
     */
    public function testAnHappySerializerExceptionIsThrownWhenUnserializeInvalidJson(): void
    {
        $this->expectException(MtgJsonSerializerException::class);
        (new MtgJsonSerializer())->unserialize('[', Ruling::class);
    }

    /**
     * @return void
     * @throws MtgJsonSerializerException
     */
    public function testAnHappySerializerExceptionIsThrownWhenUnserializeWithNonExistingClass(): void
    {
        $this->expectException(MtgJsonSerializerException::class);
        (new MtgJsonSerializer())->unserialize('[]', 'Test\Hello\Not\Exists');
    }
}
