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


/**
 * Security Policy
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#securitypolicy
 */
class SecurityPolicy implements IModel {
	/**
     * @var string Security Policy GRN
	 */
	private $securityPolicyId;
	/**
     * @var string Security Policy Name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Policy Document
	 */
	private $policy;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Security Policy GRN */
	public function getSecurityPolicyId(): ?string {
		return $this->securityPolicyId;
	}
    /** @param string|null $securityPolicyId Security Policy GRN */
	public function setSecurityPolicyId(?string $securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}
    /**
     * @param string|null $securityPolicyId Security Policy GRN
     * @return SecurityPolicy
     */
	public function withSecurityPolicyId(?string $securityPolicyId): SecurityPolicy {
		$this->securityPolicyId = $securityPolicyId;
		return $this;
	}
    /** @return string|null Security Policy Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Security Policy Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Security Policy Name
     * @return SecurityPolicy
     */
	public function withName(?string $name): SecurityPolicy {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return SecurityPolicy
     */
	public function withDescription(?string $description): SecurityPolicy {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Policy Document */
	public function getPolicy(): ?string {
		return $this->policy;
	}
    /** @param string|null $policy Policy Document */
	public function setPolicy(?string $policy) {
		$this->policy = $policy;
	}
    /**
     * @param string|null $policy Policy Document
     * @return SecurityPolicy
     */
	public function withPolicy(?string $policy): SecurityPolicy {
		$this->policy = $policy;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return SecurityPolicy
     */
	public function withCreatedAt(?int $createdAt): SecurityPolicy {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return SecurityPolicy
     */
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