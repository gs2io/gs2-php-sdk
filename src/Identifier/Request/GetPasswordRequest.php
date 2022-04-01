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

class GetPasswordRequest extends Gs2BasicRequest {
    /** @var string */
    private $userName;

	public function getUserName(): ?string {
		return $this->userName;
	}

	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	public function withUserName(?string $userName): GetPasswordRequest {
		$this->userName = $userName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPasswordRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPasswordRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
        );
    }
}