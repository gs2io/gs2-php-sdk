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
 * My Location
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#myposition
 */
class MyPosition implements IModel {
	/**
     * @var Position Position
	 */
	private $position;
	/**
     * @var Vector Vector
	 */
	private $vector;
	/**
     * @var float Radius
	 */
	private $r;
    /** @return Position|null Position */
	public function getPosition(): ?Position {
		return $this->position;
	}
    /** @param Position|null $position Position */
	public function setPosition(?Position $position) {
		$this->position = $position;
	}
    /**
     * @param Position|null $position Position
     * @return MyPosition
     */
	public function withPosition(?Position $position): MyPosition {
		$this->position = $position;
		return $this;
	}
    /** @return Vector|null Vector */
	public function getVector(): ?Vector {
		return $this->vector;
	}
    /** @param Vector|null $vector Vector */
	public function setVector(?Vector $vector) {
		$this->vector = $vector;
	}
    /**
     * @param Vector|null $vector Vector
     * @return MyPosition
     */
	public function withVector(?Vector $vector): MyPosition {
		$this->vector = $vector;
		return $this;
	}
    /** @return float|null Radius */
	public function getR(): ?float {
		return $this->r;
	}
    /** @param float|null $r Radius */
	public function setR(?float $r) {
		$this->r = $r;
	}
    /**
     * @param float|null $r Radius
     * @return MyPosition
     */
	public function withR(?float $r): MyPosition {
		$this->r = $r;
		return $this;
	}

    public static function fromJson(?array $data): ?MyPosition {
        if ($data === null) {
            return null;
        }
        return (new MyPosition())
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? Position::fromJson($data['position']) : null)
            ->withVector(array_key_exists('vector', $data) && $data['vector'] !== null ? Vector::fromJson($data['vector']) : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null);
    }

    public function toJson(): array {
        return array(
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "vector" => $this->getVector() !== null ? $this->getVector()->toJson() : null,
            "r" => $this->getR(),
        );
    }
}