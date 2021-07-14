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

class GetSecurityPolicyRequest extends Gs2BasicRequest {
    /** @var string */
    private $securityPolicyName;

	public function getSecurityPolicyName(): ?string {
		return $this->securityPolicyName;
	}

	public function setSecurityPolicyName(?string $securityPolicyName) {
		$this->securityPolicyName = $securityPolicyName;
	}

	public function withSecurityPolicyName(?string $securityPolicyName): GetSecurityPolicyRequest {
		$this->securityPolicyName = $securityPolicyName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSecurityPolicyRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSecurityPolicyRequest())
            ->withSecurityPolicyName(empty($data['securityPolicyName']) ? null : $data['securityPolicyName']);
    }

    public function toJson(): array {
        return array(
            "securityPolicyName" => $this->getSecurityPolicyName(),
        );
    }
}