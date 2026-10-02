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

/**
 * Request for putPositionByUserId: Put position by User ID
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#putpositionbyuserid
 */
class PutPositionByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Area name */
    private $areaModelName;
    /** @var string Layer name */
    private $layerModelName;
    /** @var Position Position */
    private $position;
    /** @var Vector Vector */
    private $vector;
    /** @var float Radius */
    private $r;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return PutPositionByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PutPositionByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return PutPositionByUserIdRequest
     */
	public function withUserId(?string $userId): PutPositionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Area name */
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
    /** @param string|null $areaModelName Area name */
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
    /**
     * @param string|null $areaModelName Area name
     * @return PutPositionByUserIdRequest
     */
	public function withAreaModelName(?string $areaModelName): PutPositionByUserIdRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
    /** @return string|null Layer name */
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
    /** @param string|null $layerModelName Layer name */
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
    /**
     * @param string|null $layerModelName Layer name
     * @return PutPositionByUserIdRequest
     */
	public function withLayerModelName(?string $layerModelName): PutPositionByUserIdRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
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
     * @return PutPositionByUserIdRequest
     */
	public function withPosition(?Position $position): PutPositionByUserIdRequest {
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
     * @return PutPositionByUserIdRequest
     */
	public function withVector(?Vector $vector): PutPositionByUserIdRequest {
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
     * @return PutPositionByUserIdRequest
     */
	public function withR(?float $r): PutPositionByUserIdRequest {
		$this->r = $r;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return PutPositionByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PutPositionByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PutPositionByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PutPositionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PutPositionByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? Position::fromJson($data['position']) : null)
            ->withVector(array_key_exists('vector', $data) && $data['vector'] !== null ? Vector::fromJson($data['vector']) : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "vector" => $this->getVector() !== null ? $this->getVector()->toJson() : null,
            "r" => $this->getR(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}