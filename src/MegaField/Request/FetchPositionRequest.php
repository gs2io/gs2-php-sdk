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

class FetchPositionRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $areaModelName;
    /** @var string */
    private $layerModelName;
    /** @var array */
    private $userIds;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): FetchPositionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): FetchPositionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): FetchPositionRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): FetchPositionRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getUserIds(): ?array {
		return $this->userIds;
	}
	public function setUserIds(?array $userIds) {
		$this->userIds = $userIds;
	}
	public function withUserIds(?array $userIds): FetchPositionRequest {
		$this->userIds = $userIds;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): FetchPositionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?FetchPositionRequest {
        if ($data === null) {
            return null;
        }
        return (new FetchPositionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('userIds', $data) && $data['userIds'] !== null ? $data['userIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "userIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getUserIds() !== null && $this->getUserIds() !== null ? $this->getUserIds() : []
            ),
        );
    }
}