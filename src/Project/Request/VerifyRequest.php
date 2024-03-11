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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class VerifyRequest extends Gs2BasicRequest {
    /** @var string */
    private $verifyToken;
	public function getVerifyToken(): ?string {
		return $this->verifyToken;
	}
	public function setVerifyToken(?string $verifyToken) {
		$this->verifyToken = $verifyToken;
	}
	public function withVerifyToken(?string $verifyToken): VerifyRequest {
		$this->verifyToken = $verifyToken;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRequest())
            ->withVerifyToken(array_key_exists('verifyToken', $data) && $data['verifyToken'] !== null ? $data['verifyToken'] : null);
    }

    public function toJson(): array {
        return array(
            "verifyToken" => $this->getVerifyToken(),
        );
    }
}