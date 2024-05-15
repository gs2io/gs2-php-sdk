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


class RoleModel implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $policyDocument;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RoleModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RoleModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getPolicyDocument(): ?string {
		return $this->policyDocument;
	}
	public function setPolicyDocument(?string $policyDocument) {
		$this->policyDocument = $policyDocument;
	}
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