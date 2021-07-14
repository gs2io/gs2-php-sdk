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

class ForgetRequest extends Gs2BasicRequest {
    /** @var string */
    private $email;

	public function getEmail(): ?string {
		return $this->email;
	}

	public function setEmail(?string $email) {
		$this->email = $email;
	}

	public function withEmail(?string $email): ForgetRequest {
		$this->email = $email;
		return $this;
	}

    public static function fromJson(?array $data): ?ForgetRequest {
        if ($data === null) {
            return null;
        }
        return (new ForgetRequest())
            ->withEmail(empty($data['email']) ? null : $data['email']);
    }

    public function toJson(): array {
        return array(
            "email" => $this->getEmail(),
        );
    }
}