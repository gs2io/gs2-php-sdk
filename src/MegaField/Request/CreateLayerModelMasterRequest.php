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

class CreateLayerModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $areaModelName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateLayerModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): CreateLayerModelMasterRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateLayerModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateLayerModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateLayerModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateLayerModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateLayerModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "areaModelName" => $this->getAreaModelName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
        );
    }
}