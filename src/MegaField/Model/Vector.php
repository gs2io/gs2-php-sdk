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


class Vector implements IModel {
	/**
     * @var float
	 */
	private $x;
	/**
     * @var float
	 */
	private $y;
	/**
     * @var float
	 */
	private $z;
	public function getX(): ?float {
		return $this->x;
	}
	public function setX(?float $x) {
		$this->x = $x;
	}
	public function withX(?float $x): Vector {
		$this->x = $x;
		return $this;
	}
	public function getY(): ?float {
		return $this->y;
	}
	public function setY(?float $y) {
		$this->y = $y;
	}
	public function withY(?float $y): Vector {
		$this->y = $y;
		return $this;
	}
	public function getZ(): ?float {
		return $this->z;
	}
	public function setZ(?float $z) {
		$this->z = $z;
	}
	public function withZ(?float $z): Vector {
		$this->z = $z;
		return $this;
	}

    public static function fromJson(?array $data): ?Vector {
        if ($data === null) {
            return null;
        }
        return (new Vector())
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