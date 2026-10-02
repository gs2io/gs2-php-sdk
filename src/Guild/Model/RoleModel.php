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

namespace Gs2\Guild\Model;

use Gs2\Core\Model\IModel;


/**
 * Role Model
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#rolemodel
 */
class RoleModel implements IModel {
	/**
     * @var string Role Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Policy Document
	 */
	private $policyDocument;
    /** @return string|null Role Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Role Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Role Model name
     * @return RoleModel
     */
	public function withName(?string $name): RoleModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return RoleModel
     */
	public function withMetadata(?string $metadata): RoleModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Policy Document */
	public function getPolicyDocument(): ?string {
		return $this->policyDocument;
	}
    /** @param string|null $policyDocument Policy Document */
	public function setPolicyDocument(?string $policyDocument) {
		$this->policyDocument = $policyDocument;
	}
    /**
     * @param string|null $policyDocument Policy Document
     * @return RoleModel
     */
	public function withPolicyDocument(?string $policyDocument): RoleModel {
		$this->policyDocument = $policyDocument;
		return $this;
	}

    public static function fromJson(?array $data): ?RoleModel {
        if ($data === null) {
            return null;
        }
        return (new RoleModel())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withPolicyDocument(array_key_exists('policyDocument', $data) && $data['policyDocument'] !== null ? $data['policyDocument'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "policyDocument" => $this->getPolicyDocument(),
        );
    }
}