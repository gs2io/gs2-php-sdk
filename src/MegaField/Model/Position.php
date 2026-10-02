<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\MegaField\Model;

use Gs2\Core\Model\IModel;


/**
 * Position
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#position
 */
class Position implements IModel {
	/**
     * @var float X position
	 */
	private $x;
	/**
     * @var float Y position
	 */
	private $y;
	/**
     * @var float Z position
	 */
	private $z;
    /** @return float|null X position */
	public function getX(): ?float {
		return $this->x;
	}
    /** @param float|null $x X position */
	public function setX(?float $x) {
		$this->x = $x;
	}
    /**
     * @param float|null $x X position
     * @return Position
     */
	public function withX(?float $x): Position {
		$this->x = $x;
		return $this;
	}
    /** @return float|null Y position */
	public function getY(): ?float {
		return $this->y;
	}
    /** @param float|null $y Y position */
	public function setY(?float $y) {
		$this->y = $y;
	}
    /**
     * @param float|null $y Y position
     * @return Position
     */
	public function withY(?float $y): Position {
		$this->y = $y;
		return $this;
	}
    /** @return float|null Z position */
	public function getZ(): ?float {
		return $this->z;
	}
    /** @param float|null $z Z position */
	public function setZ(?float $z) {
		$this->z = $z;
	}
    /**
     * @param float|null $z Z position
     * @return Position
     */
	public function withZ(?float $z): Position {
		$this->z = $z;
		return $this;
	}

    public static function fromJson(?array $data): ?Position {
        if ($data === null) {
            return null;
        }
        return (new Position())
            ->withX(array_key_exists('x', $data) && $data['x'] !== null ? $data['x'] : null)
            ->withY(array_key_exists('y', $data) && $data['y'] !== null ? $data['y'] : null)
            ->withZ(array_key_exists('z', $data) && $data['z'] !== null ? $data['z'] : null);
    }

    public function toJson(): array {
        return array(
            "x" => $this->getX(),
            "y" => $this->getY(),
            "z" => $this->getZ(),
        );
    }
}