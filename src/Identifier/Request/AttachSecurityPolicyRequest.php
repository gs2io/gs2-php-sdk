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
 * Request for attachSecurityPolicy: Assign the Security Policy to a user
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#attachsecuritypolicy-1
 */
class AttachSecurityPolicyRequest extends Gs2BasicRequest {
    /** @var string GS2-Identifier User name */
    private $userName;
    /** @var string GRN of the Security Policy to assign */
    private $securityPolicyId;
    /** @return string|null GS2-Identifier User name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName GS2-Identifier User name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName GS2-Identifier User name
     * @return AttachSecurityPolicyRequest
     */
	public function withUserName(?string $userName): AttachSecurityPolicyRequest {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null GRN of the Security Policy to assign */
	public function getSecurityPolicyId(): ?string {
		return $this->securityPolicyId;
	}
    /** @param string|null $securityPolicyId GRN of the Security Policy to assign */
	public function setSecurityPolicyId(?string $securityPolicyId) {
		$this->securityPolicyId = $securityPolicyId;
	}
    /**
     * @param string|null $securityPolicyId GRN of the Security Policy to assign
     * @return AttachSecurityPolicyRequest
     */
	public function withSecurityPolicyId(?string $securityPolicyId): AttachSecurityPolicyRequest {
		$this->securityPolicyId = $securityPolicyId;
		return $this;
	}

    public static function fromJson(?array $data): ?AttachSecurityPolicyRequest {
        if ($data === null) {
            return null;
        }
        return (new AttachSecurityPolicyRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withSecurityPolicyId(array_key_exists('securityPolicyId', $data) && $data['securityPolicyId'] !== null ? $data['securityPolicyId'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "securityPolicyId" => $this->getSecurityPolicyId(),
        );
    }
}