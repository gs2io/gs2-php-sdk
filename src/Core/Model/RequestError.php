<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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
namespace Gs2\Core\Model;

class RequestError {

    /**
     * @var string
     */
	private $component;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $code;

	function __construct(string $component=null, string $message=null, string $code=null) {
		$this->component = $component;
        $this->message = $message;
        $this->code = $code;
	}
	
	function getComponent(): string {
		return $this->component;
	}
	function setComponent(string $component): void {
		$this->component = $component;
	}
    function getMessage(): string {
        return $this->message;
    }
    function setMessage(string $message): void  {
        $this->message = $message;
    }
    function getCode(): string {
        return $this->code;
    }
    function setCode(string $code): void  {
        $this->code = $code;
    }
}
