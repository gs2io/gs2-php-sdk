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

class UpdateSecurityPolicyRequest extends Gs2BasicRequest {
    /** @var string */
    private $securityPolicyName;
    /** @var string */
    private $description;
    /** @var string */
    private $policy;

	public function getSecurityPolicyName(): ?string {
		return $this->securityPolicyName;
	}

	public function setSecurityPolicyName(?string $securityPolicyName) {
		$this->securityPolicyName = $securityPolicyName;
	}

	public function withSecurityPolicyName(?string $securityPolicyName): UpdateSecurityPolicyRequest {
		$this->securityPolicyName = $securityPolicyName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateSecurityPolicyRequest {
		$this->description = $description;
		return $this;
	}

	public function getPolicy(): ?string {
		return $this->policy;
	}

	public function setPolicy(?string $policy) {
		$this->policy = $policy;
	}

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