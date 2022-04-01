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


class ProjectToken implements IModel {
	/**
     * @var string
	 */
	private $token;

	public function getToken(): ?string {
		return $this->token;
	}

	public function setToken(?string $token) {
		$this->token = $token;
	}

	public function withToken(?string $token): ProjectToken {
		$this->token = $token;
		return $this;
	}

    public static function fromJson(?array $data): ?ProjectToken {
        if ($data === null) {
            return null;
        }
        return (new ProjectToken())
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null);
    }

    public function toJson(): array {
        return array(
            "token" => $this->getToken(),
        );
    }
}