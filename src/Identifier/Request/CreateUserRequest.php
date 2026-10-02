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
 * Request for createUser: Create User
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#createuser
 */
class CreateUserRequest extends Gs2BasicRequest {
    /** @var string GS2-Identifier User name */
    private $name;
    /** @var string Description */
    private $description;
    /** @return string|null GS2-Identifier User name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name GS2-Identifier User name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name GS2-Identifier User name
     * @return CreateUserRequest
     */
	public function withName(?string $name): CreateUserRequest {
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
     * @return CreateUserRequest
     */
	public function withDescription(?string $description): CreateUserRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateUserRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateUserRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
        );
    }
}