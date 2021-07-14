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

namespace Gs2\Gateway\Result;

use Gs2\Core\Model\IResult;

class SendNotificationResult implements IResult {
    /** @var string */
    private $protocol;

	public function getProtocol(): ?string {
		return $this->protocol;
	}

	public function setProtocol(?string $protocol) {
		$this->protocol = $protocol;
	}

	public function withProtocol(?string $protocol): SendNotificationResult {
		$this->protocol = $protocol;
		return $this;
	}

    public static function fromJson(?array $data): ?SendNotificationResult {
        if ($data === null) {
            return null;
        }
        return (new SendNotificationResult())
            ->withProtocol(empty($data['protocol']) ? null : $data['protocol']);
    }

    public function toJson(): array {
        return array(
            "protocol" => $this->getProtocol(),
        );
    }
}