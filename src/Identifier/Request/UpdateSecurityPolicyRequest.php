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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateSecurityPolicy: Update Security Policy
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#updatesecuritypolicy
 */
class UpdateSecurityPolicyRequest extends Gs2BasicRequest {
    /** @var string Security Policy Name */
    private $securityPolicyName;
    /** @var string Description */
    private $description;
    /** @var string Policy Document */
    private $policy;
    /** @return string|null Security Policy Name */
	public function getSecurityPolicyName(): ?string {
		return $this->securityPolicyName;
	}
    /** @param string|null $securityPolicyName Security Policy Name */
	public function setSecurityPolicyName(?string $securityPolicyName) {
		$this->securityPolicyName = $securityPolicyName;
	}
    /**
     * @param string|null $securityPolicyName Security Policy Name
     * @return UpdateSecurityPolicyRequest
     */
	public function withSecurityPolicyName(?string $securityPolicyName): UpdateSecurityPolicyRequest {
		$this->securityPolicyName = $securityPolicyName;
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
     * @return UpdateSecurityPolicyRequest
     */
	public function withDescription(?string $description): UpdateSecurityPolicyRequest {
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
     * @return UpdateSecurityPolicyRequest
     */
	public function withPolicy(?string $policy): UpdateSecurityPolicyRequest {
		$this->policy = $policy;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateSecurityPolicyRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateSecurityPolicyRequest())
            ->withSecurityPolicyName(array_key_exists('securityPolicyName', $data) && $data['securityPolicyName'] !== null ? $data['securityPolicyName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPolicy(array_key_exists('policy', $data) && $data['policy'] !== null ? $data['policy'] : null);
    }

    public function toJson(): array {
        return array(
            "securityPolicyName" => $this->getSecurityPolicyName(),
            "description" => $this->getDescription(),
            "policy" => $this->getPolicy(),
        );
    }
}