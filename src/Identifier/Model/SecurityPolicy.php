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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;


class SecurityPolicy implements IModel {
	/**
     * @var string
	 */
	private $securityPolicyId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $policy;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getSecurityPolicyId(): ?string {
		return $this->securityPolicyId;
	}
	public function setSecurityPolicyId(?string $securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}
	public function withSecurityPolicyId(?string $securityPolicyId): SecurityPolicy {
		$this->securityPolicyId = $securityPolicyId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SecurityPolicy {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): SecurityPolicy {
		$this->description = $description;
		return $this;
	}
	public function getPolicy(): ?string {
		return $this->policy;
	}
	public function setPolicy(?string $policy) {
		$this->policy = $policy;
	}
	public function withPolicy(?string $policy): SecurityPolicy {
		$this->policy = $policy;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SecurityPolicy {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SecurityPolicy {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?SecurityPolicy {
        if ($data === null) {
            return null;
        }
        return (new SecurityPolicy())
            ->withSecurityPolicyId(array_key_exists('securityPolicyId', $data) && $data['securityPolicyId'] !== null ? $data['securityPolicyId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPolicy(array_key_exists('policy', $data) && $data['policy'] !== null ? $data['policy'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "securityPolicyId" => $this->getSecurityPolicyId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "policy" => $this->getPolicy(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}