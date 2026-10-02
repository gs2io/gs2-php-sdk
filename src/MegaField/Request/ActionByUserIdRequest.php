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
use Gs2\MegaField\Model\MyPosition;
use Gs2\MegaField\Model\Scope;

/**
 * Request for actionByUserId: Put position by User ID
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#actionbyuserid
 */
class ActionByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Area name */
    private $areaModelName;
    /** @var string Layer name */
    private $layerModelName;
    /** @var MyPosition My Location */
    private $position;
    /** @var array List of Scope of acquisition by other players */
    private $scopes;
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
     * @return ActionByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ActionByUserIdRequest {
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
     * @return ActionByUserIdRequest
     */
	public function withUserId(?string $userId): ActionByUserIdRequest {
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
     * @return ActionByUserIdRequest
     */
	public function withAreaModelName(?string $areaModelName): ActionByUserIdRequest {
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
     * @return ActionByUserIdRequest
     */
	public function withLayerModelName(?string $layerModelName): ActionByUserIdRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
    /** @return MyPosition|null My Location */
	public function getPosition(): ?MyPosition {
		return $this->position;
	}
    /** @param MyPosition|null $position My Location */
	public function setPosition(?MyPosition $position) {
		$this->position = $position;
	}
    /**
     * @param MyPosition|null $position My Location
     * @return ActionByUserIdRequest
     */
	public function withPosition(?MyPosition $position): ActionByUserIdRequest {
		$this->position = $position;
		return $this;
	}
    /** @return array|null List of Scope of acquisition by other players */
	public function getScopes(): ?array {
		return $this->scopes;
	}
    /** @param array|null $scopes List of Scope of acquisition by other players */
	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}
    /**
     * @param array|null $scopes List of Scope of acquisition by other players
     * @return ActionByUserIdRequest
     */
	public function withScopes(?array $scopes): ActionByUserIdRequest {
		$this->scopes = $scopes;
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
     * @return ActionByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ActionByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ActionByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ActionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ActionByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? MyPosition::fromJson($data['position']) : null)
            ->withScopes(!array_key_exists('scopes', $data) || $data['scopes'] === null ? null : array_map(
                function ($item) {
                    return Scope::fromJson($item);
                },
                $data['scopes']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "scopes" => $this->getScopes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}