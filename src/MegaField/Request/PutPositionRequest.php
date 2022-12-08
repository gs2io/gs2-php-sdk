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

namespace Gs2\MegaField\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\MegaField\Model\Position;
use Gs2\MegaField\Model\Vector;

class PutPositionRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $areaModelName;
    /** @var string */
    private $layerModelName;
    /** @var Position */
    private $position;
    /** @var Vector */
    private $vector;
    /** @var float */
    private $r;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): PutPositionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): PutPositionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): PutPositionRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): PutPositionRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getPosition(): ?Position {
		return $this->position;
	}
	public function setPosition(?Position $position) {
		$this->position = $position;
	}
	public function withPosition(?Position $position): PutPositionRequest {
		$this->position = $position;
		return $this;
	}
	public function getVector(): ?Vector {
		return $this->vector;
	}
	public function setVector(?Vector $vector) {
		$this->vector = $vector;
	}
	public function withVector(?Vector $vector): PutPositionRequest {
		$this->vector = $vector;
		return $this;
	}
	public function getR(): ?float {
		return $this->r;
	}
	public function setR(?float $r) {
		$this->r = $r;
	}
	public function withR(?float $r): PutPositionRequest {
		$this->r = $r;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PutPositionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PutPositionRequest {
        if ($data === null) {
            return null;
        }
        return (new PutPositionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? Position::fromJson($data['position']) : null)
            ->withVector(array_key_exists('vector', $data) && $data['vector'] !== null ? Vector::fromJson($data['vector']) : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "vector" => $this->getVector() !== null ? $this->getVector()->toJson() : null,
            "r" => $this->getR(),
        );
    }
}