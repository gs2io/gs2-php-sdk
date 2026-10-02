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

/**
 * Request for fetchPositionFromSystem: Fetch position
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#fetchpositionfromsystem
 */
class FetchPositionFromSystemRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Area name */
    private $areaModelName;
    /** @var string Layer name */
    private $layerModelName;
    /** @var array List of User IDs */
    private $userIds;
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
     * @return FetchPositionFromSystemRequest
     */
	public function withNamespaceName(?string $namespaceName): FetchPositionFromSystemRequest {
		$this->namespaceName = $namespaceName;
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
     * @return FetchPositionFromSystemRequest
     */
	public function withAreaModelName(?string $areaModelName): FetchPositionFromSystemRequest {
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
     * @return FetchPositionFromSystemRequest
     */
	public function withLayerModelName(?string $layerModelName): FetchPositionFromSystemRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
    /** @return array|null List of User IDs */
	public function getUserIds(): ?array {
		return $this->userIds;
	}
    /** @param array|null $userIds List of User IDs */
	public function setUserIds(?array $userIds) {
		$this->userIds = $userIds;
	}
    /**
     * @param array|null $userIds List of User IDs
     * @return FetchPositionFromSystemRequest
     */
	public function withUserIds(?array $userIds): FetchPositionFromSystemRequest {
		$this->userIds = $userIds;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): FetchPositionFromSystemRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?FetchPositionFromSystemRequest {
        if ($data === null) {
            return null;
        }
        return (new FetchPositionFromSystemRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withUserIds(!array_key_exists('userIds', $data) || $data['userIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['userIds']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "userIds" => $this->getUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getUserIds()
            ),
        );
    }
}