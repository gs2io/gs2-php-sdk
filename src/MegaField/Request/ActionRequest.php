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

class ActionRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $areaModelName;
    /** @var string */
    private $layerModelName;
    /** @var MyPosition */
    private $position;
    /** @var array */
    private $scopes;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): ActionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): ActionRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): ActionRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): ActionRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getPosition(): ?MyPosition {
		return $this->position;
	}
	public function setPosition(?MyPosition $position) {
		$this->position = $position;
	}
	public function withPosition(?MyPosition $position): ActionRequest {
		$this->position = $position;
		return $this;
	}
	public function getScopes(): ?array {
		return $this->scopes;
	}
	public function setScopes(?array $scopes) {
		$this->scopes = $scopes;
	}
	public function withScopes(?array $scopes): ActionRequest {
		$this->scopes = $scopes;
		return $this;
	}

    public static function fromJson(?array $data): ?ActionRequest {
        if ($data === null) {
            return null;
        }
        return (new ActionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? MyPosition::fromJson($data['position']) : null)
            ->withScopes(array_map(
                function ($item) {
                    return Scope::fromJson($item);
                },
                array_key_exists('scopes', $data) && $data['scopes'] !== null ? $data['scopes'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "scopes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getScopes() !== null && $this->getScopes() !== null ? $this->getScopes() : []
            ),
        );
    }
}