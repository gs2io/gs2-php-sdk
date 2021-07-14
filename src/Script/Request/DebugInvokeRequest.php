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

class DebugInvokeRequest extends Gs2BasicRequest {
    /** @var string */
    private $script;
    /** @var string */
    private $args;

	public function getScript(): ?string {
		return $this->script;
	}

	public function setScript(?string $script) {
		$this->script = $script;
	}

	public function withScript(?string $script): DebugInvokeRequest {
		$this->script = $script;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): DebugInvokeRequest {
		$this->args = $args;
		return $this;
	}

    public static function fromJson(?array $data): ?DebugInvokeRequest {
        if ($data === null) {
            return null;
        }
        return (new DebugInvokeRequest())
            ->withScript(empty($data['script']) ? null : $data['script'])
            ->withArgs(empty($data['args']) ? null : $data['args']);
    }

    public function toJson(): array {
        return array(
            "script" => $this->getScript(),
            "args" => $this->getArgs(),
        );
    }
}