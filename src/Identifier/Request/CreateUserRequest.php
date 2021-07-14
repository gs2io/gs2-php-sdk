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

class CreateUserRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateUserRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateUserRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateUserRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateUserRequest())
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description']);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
        );
    }
}