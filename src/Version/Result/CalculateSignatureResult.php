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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;

class CalculateSignatureResult implements IResult {
    /** @var string */
    private $body;
    /** @var string */
    private $signature;

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): CalculateSignatureResult {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	public function withSignature(?string $signature): CalculateSignatureResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?CalculateSignatureResult {
        if ($data === null) {
            return null;
        }
        return (new CalculateSignatureResult())
            ->withBody(empty($data['body']) ? null : $data['body'])
            ->withSignature(empty($data['signature']) ? null : $data['signature']);
    }

    public function toJson(): array {
        return array(
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}