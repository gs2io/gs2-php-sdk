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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\Material;
use Gs2\Enhance\Model\Config;

class DirectEnhanceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rateName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $targetItemSetId;
    /** @var array */
    private $materials;
    /** @var array */
    private $config;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DirectEnhanceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): DirectEnhanceRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): DirectEnhanceRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getTargetItemSetId(): ?string {
		return $this->targetItemSetId;
	}
	public function setTargetItemSetId(?string $targetItemSetId) {
		$this->targetItemSetId = $targetItemSetId;
	}
	public function withTargetItemSetId(?string $targetItemSetId): DirectEnhanceRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
	public function getMaterials(): ?array {
		return $this->materials;
	}
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
	public function withMaterials(?array $materials): DirectEnhanceRequest {
		$this->materials = $materials;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): DirectEnhanceRequest {
		$this->config = $config;
		return $this;
	}

    public static function fromJson(?array $data): ?DirectEnhanceRequest {
        if ($data === null) {
            return null;
        }
        return (new DirectEnhanceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTargetItemSetId(array_key_exists('targetItemSetId', $data) && $data['targetItemSetId'] !== null ? $data['targetItemSetId'] : null)
            ->withMaterials(array_map(
                function ($item) {
                    return Material::fromJson($item);
                },
                array_key_exists('materials', $data) && $data['materials'] !== null ? $data['materials'] : []
            ))
            ->withConfig(array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "accessToken" => $this->getAccessToken(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials() !== null && $this->getMaterials() !== null ? $this->getMaterials() : []
            ),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}