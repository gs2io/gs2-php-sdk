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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class InvokeScriptRequest extends Gs2BasicRequest {
    /** @var string */
    private $scriptId;
    /** @var string */
    private $args;
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
	public function withScriptId(?string $scriptId): InvokeScriptRequest {
		$this->scriptId = $scriptId;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): InvokeScriptRequest {
		$this->args = $args;
		return $this;
	}

    public static function fromJson(?array $data): ?InvokeScriptRequest {
        if ($data === null) {
            return null;
        }
        return (new InvokeScriptRequest())
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
        );
    }
}