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

class CreateSecurityPolicyRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $policy;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateSecurityPolicyRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateSecurityPolicyRequest {
		$this->description = $description;
		return $this;
	}
	public function getPolicy(): ?string {
		return $this->policy;
	}
	public function setPolicy(?string $policy) {
		$this->policy = $policy;
	}
	public function withPolicy(?string $policy): CreateSecurityPolicyRequest {
		$this->policy = $policy;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateSecurityPolicyRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateSecurityPolicyRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPolicy(array_key_exists('policy', $data) && $data['policy'] !== null ? $data['policy'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "policy" => $this->getPolicy(),
        );
    }
}